<?php
namespace XCode\NicotineWarning\Setup;

use Magento\Framework\Setup\UninstallInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class Uninstall implements UninstallInterface
{
    private $eavSetupFactory;
    public function __construct(\Magento\Eav\Setup\EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }
    public function uninstall(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
		$eavSetup = $this->eavSetupFactory->create();
		$entityTypeId = 4;
        $eavSetup->removeAttribute($entityTypeId, 'nicotine_warning');
			
    }
}
