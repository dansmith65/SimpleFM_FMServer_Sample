<?php
/**
 * @author Daniel Smith http://scr.im/dansmith
 */

namespace Application\Entity;

use Soliant\SimpleFM\ZF2\Entity\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;

class SeasonPointer extends AbstractEntity
{

	/**
	 * Fields
	 */
	protected $years;

	/**
	 * Read-only Fields
	 */
	protected $id;

	/**
	 * @param array $simpleFMAdapterRow
	 * @see \Soliant\SimpleFM\ZF2\Entity\Serializable::unserialize()
	 */
	public function unserialize ($simpleFMAdapterRow = array())
	{
		$this->recid                        = $simpleFMAdapterRow["recid"];
		$this->modid                        = $simpleFMAdapterRow["modid"];
		$this->years               	        = $simpleFMAdapterRow["d_years_txt"];
		$this->id                           = $simpleFMAdapterRow["__kp_season_id"];

		return $this;
	}
    
    /**
     * @see \Soliant\SimpleFM\ZF2\Entity\AbstractEntity::getControllerAlias()
     */
    function getControllerAlias()
    {
        return 'season';
    }
   
    /**
     * @see \Soliant\SimpleFM\ZF2\Entity\AbstractEntity::getEntityPointerName()
     */
    function getEntityPointerName()
    {
        return '\Application\Entity\SeasonPointer';
    }

    /**
     * @see \Soliant\SimpleFM\ZF2\Entity\AbstractEntity::getEntityName()
     */
    function getEntityName()
    {
        return '\Application\Entity\Season';
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

}