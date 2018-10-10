<?php
namespace XCode\NicotineWremove\Setup {

    class Uninstall implements \Magento\Framework\Setup\UninstallInterface
    {    
        protected $eavSetupFactory;

        public function __construct(\Magento\Eav\Setup\EavSetupFactory $eavSetupFactory)
        {
            $this->eavSetupFactory = $eavSetupFactory;
        }

        public function uninstall(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
        {
            $setup->startSetup();    
            $eavSetup = $this->eavSetupFactory->create();    
            $entityTypeId = 4; // value for eav_entity_type table, here catalog_product value is 4
            $eavSetup->removeAttribute($entityTypeId, 'nicotine_warning');    
            $setup->endSetup();    
        }
    }

}
