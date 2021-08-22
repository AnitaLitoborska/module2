<?php

if (!defined(name:'_PS_Version_'))
return false;

class ComentProduct extends Module implements \PrestaShop\PrestaShop\Core\Module\WidgetInterface
{
    private $templateFile;

    public function __construct()
    {
        $this->name = 'comentproduct';
        $this->author = 'Anita';
        $this->version = '1.0';
        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->trans('Product comment', array(), 'Modules.CommentProduct.Admin');
        $this->description = $this->trans('Allow store users to leave a comment', array(),'Modules.CommentProduct.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->temlateFile = 'module:CommentProduct/views/templates/hook/CommentProduct.tpl';
    }
    public function renderWidget($hookName, array $configuration)
    {
        $this->smarty->assign($this->getWidgetVariables($hookname, $configuration));
        return $this->fetch($this->templateFile);
    }
    public function install()
    {
        return parent::install()&&
        Db::getInstance()->execute(sql:'
                $sqlQueries = [];
                $sqlQueries[] = ' CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'product_comment` (
                    `id_comment` int(10) unsigned NOT NULL AUTO_INCREMENT,
                    `product_id` int(10) unsigned NOT NULL,
                    `user_id` int(10) unsigned NOT NULL,
                    `comment` varchar(500) unsigned NULL,
                    `date_add` datetime NOT NULL,
                    `date_upd` datetime NULL,
                    PRIMARY KEY (`id_comment`)
                ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=UTF8;');
    }
    public function uninstall()
    {
        return parent::uninstall();
    }

    public function getWidgetVariables($hookName, array $configuration)
    {

        if (Tools::isSubmit(submit:'comment')){

            print_r(Tools::getAllValues());
        }

    
        return array(
            'message' => "Great product!"
        );
    }
}