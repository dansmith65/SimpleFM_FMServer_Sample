<?php
/**
 * @author Daniel Smith http://scr.im/dansmith
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SeasonController extends AbstractActionController
{
    public function indexAction()
    {
        $gatewaySeason = $this->getServiceLocator()->get('gateway_season');
        
        $seasons = $gatewaySeason->findAll();
        
        return new ViewModel(array('seasons' => $seasons));
    }

    public function detailAction()
    {
        $gatewaySeason = $this->getServiceLocator()->get('gateway_season');
        
        $recid = $this->getRequest()->getQuery()->get('recid');
        
        $season = $gatewaySeason->find($recid);
        
        return new ViewModel(array('season' => $season, 'helloWorld' => $helloWorld));
    }
}
