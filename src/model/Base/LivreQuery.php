<?php

namespace model\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use model\Livre as ChildLivre;
use model\LivreQuery as ChildLivreQuery;
use model\Map\LivreTableMap;

/**
 * Base class that represents a query for the 'livre' table.
 *
 *
 *
 * @method     ChildLivreQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildLivreQuery orderByNom($order = Criteria::ASC) Order by the nom column
 * @method     ChildLivreQuery orderByGenre($order = Criteria::ASC) Order by the genre column
 * @method     ChildLivreQuery orderByPrix($order = Criteria::ASC) Order by the prix column
 * @method     ChildLivreQuery orderByDateParution($order = Criteria::ASC) Order by the date_parution column
 * @method     ChildLivreQuery orderByDateCreation($order = Criteria::ASC) Order by the date_creation column
 * @method     ChildLivreQuery orderByDateMaj($order = Criteria::ASC) Order by the date_maj column
 *
 * @method     ChildLivreQuery groupById() Group by the id column
 * @method     ChildLivreQuery groupByNom() Group by the nom column
 * @method     ChildLivreQuery groupByGenre() Group by the genre column
 * @method     ChildLivreQuery groupByPrix() Group by the prix column
 * @method     ChildLivreQuery groupByDateParution() Group by the date_parution column
 * @method     ChildLivreQuery groupByDateCreation() Group by the date_creation column
 * @method     ChildLivreQuery groupByDateMaj() Group by the date_maj column
 *
 * @method     ChildLivreQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLivreQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLivreQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLivre findOne(ConnectionInterface $con = null) Return the first ChildLivre matching the query
 * @method     ChildLivre findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLivre matching the query, or a new ChildLivre object populated from the query conditions when no match is found
 *
 * @method     ChildLivre findOneById(int $id) Return the first ChildLivre filtered by the id column
 * @method     ChildLivre findOneByNom(string $nom) Return the first ChildLivre filtered by the nom column
 * @method     ChildLivre findOneByGenre(string $genre) Return the first ChildLivre filtered by the genre column
 * @method     ChildLivre findOneByPrix(int $prix) Return the first ChildLivre filtered by the prix column
 * @method     ChildLivre findOneByDateParution(string $date_parution) Return the first ChildLivre filtered by the date_parution column
 * @method     ChildLivre findOneByDateCreation(string $date_creation) Return the first ChildLivre filtered by the date_creation column
 * @method     ChildLivre findOneByDateMaj(string $date_maj) Return the first ChildLivre filtered by the date_maj column
 *
 * @method     ChildLivre[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLivre objects based on current ModelCriteria
 * @method     ChildLivre[]|ObjectCollection findById(int $id) Return ChildLivre objects filtered by the id column
 * @method     ChildLivre[]|ObjectCollection findByNom(string $nom) Return ChildLivre objects filtered by the nom column
 * @method     ChildLivre[]|ObjectCollection findByGenre(string $genre) Return ChildLivre objects filtered by the genre column
 * @method     ChildLivre[]|ObjectCollection findByPrix(int $prix) Return ChildLivre objects filtered by the prix column
 * @method     ChildLivre[]|ObjectCollection findByDateParution(string $date_parution) Return ChildLivre objects filtered by the date_parution column
 * @method     ChildLivre[]|ObjectCollection findByDateCreation(string $date_creation) Return ChildLivre objects filtered by the date_creation column
 * @method     ChildLivre[]|ObjectCollection findByDateMaj(string $date_maj) Return ChildLivre objects filtered by the date_maj column
 * @method     ChildLivre[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LivreQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \model\Base\LivreQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'custom_framework', $modelName = '\\model\\Livre', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLivreQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLivreQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLivreQuery) {
            return $criteria;
        }
        $query = new ChildLivreQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildLivre|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LivreTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LivreTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildLivre A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nom, genre, prix, date_parution, date_creation, date_maj FROM livre WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildLivre $obj */
            $obj = new ChildLivre();
            $obj->hydrate($row);
            LivreTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildLivre|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildLivreQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LivreTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLivreQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LivreTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLivreQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LivreTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LivreTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LivreTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the nom column
     *
     * Example usage:
     * <code>
     * $query->filterByNom('fooValue');   // WHERE nom = 'fooValue'
     * $query->filterByNom('%fooValue%'); // WHERE nom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nom The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLivreQuery The current query, for fluid interface
     */
    public function filterByNom($nom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nom)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nom)) {
                $nom = str_replace('*', '%', $nom);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LivreTableMap::COL_NOM, $nom, $comparison);
    }

    /**
     * Filter the query on the genre column
     *
     * Example usage:
     * <code>
     * $query->filterByGenre('fooValue');   // WHERE genre = 'fooValue'
     * $query->filterByGenre('%fooValue%'); // WHERE genre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $genre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLivreQuery The current query, for fluid interface
     */
    public function filterByGenre($genre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($genre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $genre)) {
                $genre = str_replace('*', '%', $genre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LivreTableMap::COL_GENRE, $genre, $comparison);
    }

    /**
     * Filter the query on the prix column
     *
     * Example usage:
     * <code>
     * $query->filterByPrix(1234); // WHERE prix = 1234
     * $query->filterByPrix(array(12, 34)); // WHERE prix IN (12, 34)
     * $query->filterByPrix(array('min' => 12)); // WHERE prix > 12
     * </code>
     *
     * @param     mixed $prix The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLivreQuery The current query, for fluid interface
     */
    public function filterByPrix($prix = null, $comparison = null)
    {
        if (is_array($prix)) {
            $useMinMax = false;
            if (isset($prix['min'])) {
                $this->addUsingAlias(LivreTableMap::COL_PRIX, $prix['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prix['max'])) {
                $this->addUsingAlias(LivreTableMap::COL_PRIX, $prix['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LivreTableMap::COL_PRIX, $prix, $comparison);
    }

    /**
     * Filter the query on the date_parution column
     *
     * Example usage:
     * <code>
     * $query->filterByDateParution('2011-03-14'); // WHERE date_parution = '2011-03-14'
     * $query->filterByDateParution('now'); // WHERE date_parution = '2011-03-14'
     * $query->filterByDateParution(array('max' => 'yesterday')); // WHERE date_parution > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateParution The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLivreQuery The current query, for fluid interface
     */
    public function filterByDateParution($dateParution = null, $comparison = null)
    {
        if (is_array($dateParution)) {
            $useMinMax = false;
            if (isset($dateParution['min'])) {
                $this->addUsingAlias(LivreTableMap::COL_DATE_PARUTION, $dateParution['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateParution['max'])) {
                $this->addUsingAlias(LivreTableMap::COL_DATE_PARUTION, $dateParution['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LivreTableMap::COL_DATE_PARUTION, $dateParution, $comparison);
    }

    /**
     * Filter the query on the date_creation column
     *
     * Example usage:
     * <code>
     * $query->filterByDateCreation('2011-03-14'); // WHERE date_creation = '2011-03-14'
     * $query->filterByDateCreation('now'); // WHERE date_creation = '2011-03-14'
     * $query->filterByDateCreation(array('max' => 'yesterday')); // WHERE date_creation > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateCreation The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLivreQuery The current query, for fluid interface
     */
    public function filterByDateCreation($dateCreation = null, $comparison = null)
    {
        if (is_array($dateCreation)) {
            $useMinMax = false;
            if (isset($dateCreation['min'])) {
                $this->addUsingAlias(LivreTableMap::COL_DATE_CREATION, $dateCreation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreation['max'])) {
                $this->addUsingAlias(LivreTableMap::COL_DATE_CREATION, $dateCreation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LivreTableMap::COL_DATE_CREATION, $dateCreation, $comparison);
    }

    /**
     * Filter the query on the date_maj column
     *
     * Example usage:
     * <code>
     * $query->filterByDateMaj('2011-03-14'); // WHERE date_maj = '2011-03-14'
     * $query->filterByDateMaj('now'); // WHERE date_maj = '2011-03-14'
     * $query->filterByDateMaj(array('max' => 'yesterday')); // WHERE date_maj > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateMaj The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLivreQuery The current query, for fluid interface
     */
    public function filterByDateMaj($dateMaj = null, $comparison = null)
    {
        if (is_array($dateMaj)) {
            $useMinMax = false;
            if (isset($dateMaj['min'])) {
                $this->addUsingAlias(LivreTableMap::COL_DATE_MAJ, $dateMaj['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateMaj['max'])) {
                $this->addUsingAlias(LivreTableMap::COL_DATE_MAJ, $dateMaj['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LivreTableMap::COL_DATE_MAJ, $dateMaj, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLivre $livre Object to remove from the list of results
     *
     * @return $this|ChildLivreQuery The current query, for fluid interface
     */
    public function prune($livre = null)
    {
        if ($livre) {
            $this->addUsingAlias(LivreTableMap::COL_ID, $livre->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the livre table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LivreTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LivreTableMap::clearInstancePool();
            LivreTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LivreTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LivreTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LivreTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LivreTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildLivreQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(LivreTableMap::COL_DATE_MAJ, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildLivreQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(LivreTableMap::COL_DATE_MAJ);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildLivreQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(LivreTableMap::COL_DATE_MAJ);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildLivreQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(LivreTableMap::COL_DATE_CREATION);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildLivreQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(LivreTableMap::COL_DATE_CREATION, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildLivreQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(LivreTableMap::COL_DATE_CREATION);
    }

} // LivreQuery
