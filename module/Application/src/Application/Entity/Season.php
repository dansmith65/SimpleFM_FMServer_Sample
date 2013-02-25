<?php
/**
 * @author Daniel Smith http://scr.im/dansmith
 */

namespace Application\Entity;

use Soliant\SimpleFM\ZF2\Entity\SerializableEntityInterface;
use Doctrine\Common\Collections\ArrayCollection;
//use Application\Entity\Task;

class Season extends SeasonPointer implements SerializableEntityInterface
{

	/**
	 * Fields
	 */
	protected $years;
	protected $year;

	/**
	 * Read-only Fields
	 */
	protected $id;

	// Child Pointers
// TODO: add episode (and super container?)
//	protected $tasks;

	public function __construct($simpleFMAdapterRow = array())
	{
//		$this->tasks = new ArrayCollection();
		parent::__construct($simpleFMAdapterRow);
	}

	/**
	 * @param array $simpleFMAdapterRow
	 * @see \Soliant\SimpleFM\ZF2\Entity\Serializable::unserialize()
	 */
	public function unserialize ($simpleFMAdapterRow = array())
	{
		$this->recid                        = $simpleFMAdapterRow["recid"];
		$this->modid                        = $simpleFMAdapterRow["modid"];
		$this->years               	        = $simpleFMAdapterRow["d_years_txt"];
		$this->year                			= $simpleFMAdapterRow["d_year_num"];
		$this->id                           = $simpleFMAdapterRow["__kp_season_id"];

		/*
		if (!empty($simpleFMAdapterRow["Tasks"]["rows"])){
			foreach ($simpleFMAdapterRow["Tasks"]["rows"] as $row){
				$this->tasks[] = new TaskPointer($row);
			}
		}*/

		return $this;
	}

	/**
	 * @see \Soliant\SimpleFM\ZF2\Entity\Serializable::serialize()
	 */
	public function serialize()
	{
		$simpleFMAdapterRow["-recid"]         = $this->getRecid();
		$simpleFMAdapterRow["-modid"]         = $this->getModid();
		$simpleFMAdapterRow["d_years_txt"]    = $this->getYears();
		$simpleFMAdapterRow["d_year_num"]     = $this->getYear();
		$simpleFMAdapterRow["__kp_season_id"] = $this->getId();

		return $simpleFMAdapterRow;
	}

	/**
	 * @see \Soliant\SimpleFM\ZF2\Entity\AbstractEntity::getName()
	 */
	public function getName()
	{
		return $this->getYears();
	}

	/**
	 * @return the $years
	 */
	public function getYears ()
	{
		return $this->years;
	}

	/**
	 * @param array $years
	 * @return \Application\Entity\Season
	 */
	public function setYears ($years)
	{
		$this->years = $years;
		return $this;
	}

	/**
	 * @return the $year
	 */
	public function getYear ()
	{
		return $this->year;
	}

	/**
	 * @param array $year
	 * @return \Application\Entity\Season
	 */
	public function setYear ($year)
	{
		$this->year = $year;
		return $this;
	}

	/**
	 * @return the $tasks
	 */
	/*
	public function getTasks ()
	{
		return $this->tasks;
	}
	*/

}