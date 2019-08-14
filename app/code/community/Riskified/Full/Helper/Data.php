<?php

require_once(Mage::getBaseDir('lib') . DIRECTORY_SEPARATOR . 'riskified_php_sdk' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Riskified' . DIRECTORY_SEPARATOR . 'autoloader.php');

class Riskified_Full_Helper_Data extends Mage_Core_Helper_Abstract {

    public function getAdminUrl(){
      $out = null;
      $match = preg_match("/(.*)full\/response\/getresponse.*/i", Mage::helper('adminhtml')->getUrl('full/response/getresponse'),$out);
      if ($match){
        return $out[1];
      }else{
        return "";
      }
    }

    public function getAuthToken(){
      return Mage::getStoreConfig('fullsection/full/key',Mage::app()->getStore());
    }

    public function getConfigStatusControlActive(){
        return Mage::getStoreConfig('fullsection/full/order_status_sync');
    }

    public function getConfigEnv(){
        return 'Riskified\Common\Env::' . Mage::getStoreConfig('fullsection/full/env');
    }

    public function getConfigBeaconUrl(){
        return Mage::getStoreConfig('fullsection/full/beaconurl');
    }

    public function getShopDomain(){
      return Mage::getStoreConfig('fullsection/full/domain');
    }

    public function getExtensionVersion(){
        return (string) Mage::getConfig()->getNode()->modules->Riskified_Full->version;
    }
    
    public function getSessionId(){
        $visitorData = Mage::getSingleton('core/session')->getVisitorData();
        return $visitorData['session_id'];
    }

    /**
     * @return string
     */
    public function getSdkVersion()
    {
        return Riskified\Common\Riskified::VERSION;
    }

    /**
     * @return string
     */
    public function getSdkApiVersion()
    {
        return Riskified\Common\Riskified::API_VERSION;
    }
}