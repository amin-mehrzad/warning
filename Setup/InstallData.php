<?php
namespace XCode\NicotineWarning\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;



class InstallData implements InstallDataInterface
{



    private $eavSetupFactory;
	private $blockFactory;	
	
    public function __construct(\Magento\Eav\Setup\EavSetupFactory $eavSetupFactory, \Magento\Cms\Model\BlockFactory $blockFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
		$this->blockFactory = $blockFactory;
    }
	
	
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {

		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
		$eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'nicotine_warning',
      [
                'group' => 'General',
                'type' => 'int',
                'label' => 'Nicotine Warning',
                'input' => 'boolean',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
                'frontend' => '',
                'backend' => '',
                'required' => true,
                'sort_order' => 50,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'visible' => true,
                'is_html_allowed_on_front' => true,
                'visible_on_front' => true,
				'user_defined' => true,
				'default' => '0'
            ] 
        );
		
		
		$cmsBlockData = [
            'title' => 'Nicotine Warning Block',
            'identifier' => 'avc_nw_block',
            'content' => "<h1>Write your custom cms block content.......</h1>",
            'is_active' => 1,
            'stores' => [0],
            'sort_order' => 0
        ];
 
        $this->blockFactory->create()->setData($cmsBlockData)->save();
    }
}
