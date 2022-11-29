<?php
namespace Milan\DisableRegistrationModule\Plugins;

use Magento\Customer\Model\Registration;
use Magento\Framework\App\Config\ScopeConfigInterface;

class DisableRegistration
{
    protected $scopeConfig;
    public function __construct(ScopeConfigInterface $scopeConfig)
    {   
       $this->scopeConfig= $scopeConfig;
    }

    public function afterIsAllowed(Registration $subject, $result)
    {
        $path='customer/create_account/disable_customer_registration';
        $config=$this->scopeConfig->isSetFlag($path, $scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null);
        if($config==true){return false;
        
        }
        return $result;
        
    }
}