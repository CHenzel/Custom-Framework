<?php

namespace lib\datagrid;

use lib\datagrid\PropelDatagridInterface;
use lib\utils;
use PropelCollection;
//use Symfony\Component\Form\FormFactory;

/**
 * Datagrid management class that support and handle pagination, sort, filter
 * and now, export actions.
 * @author Maxime CORSON <maxime.corson@spyrit.net>
 */
abstract class PropelDatagrid implements PropelDatagridInterface
{
    /**
     * The query that filter the results
     * @var \PropelQuery 
     */
    protected $query;
    
    /**
     * @var FromFilter
     */
    protected $filter;
    
    /**
     * Results of the query (in fact this is a PropelPager object which contains
     * the result set and some methods to display pager and extra things)
     * @var \PropelPager
     */
    protected $results;
    
    /**
     * Number of result(s) to display per page 
     * @var integer 
     */
    protected $maxPerPage;
    
    /**
     * Options that you can use in your Datagrid methods if you need
     * (Will be deprecated if not used)
     * @var integer 
     */
    protected $options;
    
    protected $request;
    
    protected $generator;
    
    public function __construct($generator,$request,$options = array())
    {
        $this->request = $request;
        $this->query = $this->configureQuery();
        $this->options = $options;
        $this->generator = $generator;
        $this->buildForm();
    }
    
    /**
     * @param type $container
     * @return \self
     */
    public static function create()
    {
        $class = get_called_class();
        return new $class();
    }
    
    public function execute()
    {
        $this->preExecute();
        
        if($this->getRequest()->get($this->getActionParameterName()) == $this->getResetActionParameterName())
        {
            $this->reset();
        }
        else{ //Attention ne prend plus en compte les defaults filters
            $this->filter();
            $this->sort();
        }
        
        $this->results = $this->getQuery()->paginate($this->getCurrentPage(), $this->getMaxPerPage());
        
        $this->postExecute();
        
        return $this;
    }
    
    public function preExecute()
    {
        return;
    }
    
    public function postExecute()
    {
        return;
    }
    
    private function filter()
    {
        if($this->getRequest()->isMethod('post') /*&& $this->getRequest()->get($this->filter->getName())*/)
        {
            $data = $this->getRequest()->request->all();
        }
        else
        {
            $data = $this->getRequest()->getSession()->get($this->getSessionName().'.filter', $this->getDefaultFilters());
        }
        
        $this->getRequest()->getSession()->set($this->getSessionName().'.filter', $data);
        
        $this->filter->updateBuilder($data);
        
        $this->applyFilter($data);
        
//        if($form->isValid())
//        {
//            if($this->getRequest()->isMethod('post'))
//            {
//                $this->getRequest()->getSession()->set($this->getSessionName().'.filter', $data);
//            }
//            $this->applyFilter($formData);
//        }
        
        return $this;
    }
    
    private function applyFilter($data)
    {
        foreach($data as $key => $value)
        {
            $empty = true;
            
            if(($value instanceof PropelCollection || is_array($value)))
            {
                if(count($value) > 0)
                {
                    $empty = false;
                }
            }
            elseif(!empty($value) || $value === 0)
            {
                $empty = false;
            }
            
            if(!$empty)
            {
                $method = 'filterBy'.utils::camelize($key,true);
                $formView = $this->configureFilter();
                
                if($formView[$key]['type'] === 'text')
                {
                    $this->getQuery()->$method('%'.$value.'%', \Criteria::LIKE);
                }
                else
                {
                    $this->getQuery()->$method($value);
                }
            }
        }
    }
    
    protected function sort()
    {
        $namespace = $this->getSessionName().'.'.$this->getSortActionParameterName();
        
        $sort = $this->getSession()->get($namespace)? $this->getSession()->get($namespace) : $this->getDefaultSort();
        
        if(
            $this->getRequest()->get($this->getActionParameterName()) == $this->getSortActionParameterName() &&
            $this->getRequest()->get($this->getDatagridParameterName()) == $this->getName()
        )
        {
            $sort['column'] = $this->getRequest()->get($this->getSortColumnParameterName());
            $sort['order'] = $this->getRequest()->get($this->getSortOrderParameterName());
            
            $this->getSession()->set($namespace, $sort);
        }
        $method = 'orderBy'.  ucfirst($sort['column']);
        
        try
        {
            $this->getQuery()->$method($sort['order']);
        }
        catch(\Exception $e)
        {
            throw new \Exception('There is no method "'.$method.'" to sort the datagrid on column "'.$sort['column'].'". Just create it in the "'.get_class($this->query).'" object.');
        }
    }
    
    protected function getDefaultFilters()
    {
        return array();
    }
    
    public function getDefaultSort()
    {
        return array(
            'column' => $this->getDefaultSortColumn(),
            'order' => $this->getDefaultSortOrder(),
        );
    }
    
    public function getSortColumn()
    {
        $sort = $this->getSession()->get($this->getSessionName().'.'.$this->getSortActionParameterName(), $this->getDefaultSort());
        return $sort['column'];
    }
    
    public function getSortOrder()
    {
        $sort = $this->getSession()->get($this->getSessionName().'.'.$this->getSortActionParameterName(), $this->getDefaultSort());
        return $sort['order'];
    }
    
    public function reset()
    {
        if($this->getRequest()->get($this->getDatagridParameterName()) == $this->getName())
        {
            return $this
                ->resetFilters()
                ->resetSort();
        }
        return $this;
    }
    
    public function resetFilters()
    {
        $this->getRequest()->getSession()->remove($this->getSessionName().'.filter');
        $data = $this->getRequest()->getSession()->get($this->getSessionName().'.filter', $this->getDefaultFilters());
        $this->filter->resetBuilder($data);
        
        return $this;
    }
    
    public function resetSort()
    {
        $this->getRequest()->getSession()->remove($this->getSessionName().'.'.$this->getSortActionParameterName());
        return $this;
    }
    
    protected function buildForm()
    {
        $filters = $this->configureFilter();
        
        if(!empty($filters))
        {
            $data = $this->getRequest()->getSession()->get($this->getSessionName().'.filter', $this->getDefaultFilters());
       
            $this->filter = new FormFilter($filters,$this->getName(),$data);
        }
        $this->configureFilterBuilder($this->filter);
    }
    
    public function configureFilter()
    {
        return array();
    }
    
    /**
     * Shortcut 
     */
    public function getFilterFormView()
    {
        $filter = $this->filter->getBuilder();
        return $filter[$this->filter->getName()];
    }
    
    public function getMaxPerPage()
    {
        if($this->maxPerPage)
        {
            return $this->maxPerPage;
        }
        return 30;
    }
    
    public function getSessionName()
    {
        return 'datagrid.'.$this->getName();
    }
    
    public function setMaxPerPage($v)
    {
        $this->maxPerPage = $v;
    }
    
    public function getCurrentPage($default = 1)
    {
        $name = $this->getSessionName().'.'.$this->getPageParameterName();
        if($this->getRequest()->get($this->getDatagridParameterName()) == $this->getName())
        {
            $page = $this->getRequest()->get($this->getPageParameterName());
        }
        if(!isset($page))
        {
            $page = $this->getRequest()->getSession()->get($name, $default);
        }
        $this->getRequest()->getSession()->set($name, $page);
        
        return $page;
    }
    
    public function getActionParameterName()
    {
        return 'action';
    }
    
    public function getSortActionParameterName()
    {
        return 'sort';
    }
    
    public function getPageActionParameterName()
    {
        return 'page';
    }
    
    public function getDatagridParameterName()
    {
        return 'datagrid';
    }
    
    public function getPageParameterName()
    {
        return 'param1';
    }
    
    public function getResetActionParameterName()
    {
        return 'reset';
    }
    
    public function getSortColumnParameterName()
    {
        return 'param1';
    }
    
    public function getSortOrderParameterName()
    {
        return 'param2';
    }
    
    public function getDefaultSortOrder()
    {
        return strtolower(\Criteria::ASC);
    }
    
    public function configureFilterForm()
    {
        return array();
    }
    
    public function configureFilterBuilder($builder)
    {
        /**
         * Do what you want with the builder. For example, add Event Listener PRE/POST_SET_DATA, etc.
         */
        return;
    }
    
    /**
     * Shortcut to return the request service.
     * @return RequesttRequest()
     * 
     */
    protected function getRequest()
    {
        return $this->request;
    }
    
    /**
     * Shortcut to return the request service.
     * @return RequesttSession()
     * 
     */
    protected function getSession()
    {
        return $this->request->getSession();
    }
    
    public function getQuery()
    {
        return $this->query;
    }
    
    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }
    
    public function getResults()
    {
        return $this->results;
    }
    
    public function getPager()
    {
        return $this->getResults();
    }
    
    /**
     * Generate pagination route
     * @param type $route
     * @param type $extraParams
     * @return type
     */
    public function getPaginationPath($route, $page, $extraParams = array())
    {
        $params = array(
            $this->getActionParameterName() => $this->getPageActionParameterName(),
            $this->getDatagridParameterName() => $this->getName(),
            $this->getPageParameterName() => $page,
        );
        return $this->generator->generate($route, array_merge($params, $extraParams));
    }
    
    /**
     * Generate reset route for the button view
     * @param type $route
     * @param type $extraParams
     * @return type
     */
    public function getResetPath($route, $extraParams = array())
    {
        $params = array(
            $this->getActionParameterName() => $this->getResetActionParameterName(),
            $this->getDatagridParameterName() => $this->getName(),
        );
        return $this->generator->generate($route, array_merge($params, $extraParams));
    }
    
    /**
     * Generate sorting route for a given column to be displayed in view
     * @todo Remove the order parameter and ask to the datagrid to guess it ?
     * @param type $route
     * @param type $column
     * @param type $order
     * @param type $extraParams
     * @return type
     */
    public function getSortPath($route, $column, $order, $extraParams = array())
    {
        $params = array(
            $this->getActionParameterName() => $this->getSortActionParameterName(),
            $this->getDatagridParameterName() => $this->getName(),
            $this->getSortColumnParameterName() => $column,
            $this->getSortOrderParameterName() => $order,
        );
        return $this->generator->generate($route, array_merge($params, $extraParams));
    }
}
