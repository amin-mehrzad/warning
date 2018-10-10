<?php
namespace XCode\NicotineWarning\Setup;

use Magento\Cms\Model\Page;
use Magento\Cms\Model\PageFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * Page factory.
     *
     * @var PageFactory
     */

	private $blockFactory;

    /**
     * Init.
     *
     * @param PageFactory $pageFactory
     */
   public function __construct(
   
    \Magento\Cms\Model\BlockFactory $blockFactory
  )
{
  
    $this->blockFactory = $blockFactory;
}

    /**
     * Upgrade.
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.2') < 0) {
			$testBlock = [
            'title' => 'Nicotine Warning Block',
            'identifier' => 'avc_nw_block',
            'content' => "<h1>.......</h1>",
            'is_active' => 1,
            'stores' => [0],
            'sort_order' => 0
			];
			$this->blockFactory->create()->setData($testBlock)->save();            
        }
        $setup->endSetup();
    }
}