<?php
namespace
{

    class JDTestimonials extends Module
    {
        public function __construct()
        {
            $this->name = 'jdtestimonials';
            $this->tab = 'front_office_features';
            $this->version = '1.0.0';
            $this->author = 'Juan ROMERO';
            $this->need_instance = 0;
            $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
            $this->bootstrap = true;

            parent::__construct();

            $this->displayName = $this->l('testimonials');
            $this->description = $this->l('Description of my module for displaying testimonials.');

            $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

            if (!Configuration::get('JDTestimonials')) {
                $this->warning = $this->l('No name provided');
            }
        }

        public function installdb()
        {
            return Db::getInstance()->Execute('
            CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'testimonials (
                `id_testimonials` int(11) NOT NULL AUTO_INCREMENT,
                `author`  char(100) NOT NULL,
                `body` text NOT NULL,
                PRIMARY KEY (`id_testimonials`)
                ) ENGINE= '._MYSQL_ENGINE_.'  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
                ');
        }

        public function install()
        {
            if (Shop::isFeatureActive()) {
                Shop::setContext(Shop::CONTEXT_ALL);
            }

            if (!parent::install() ||
            !$this->registerHook('leftColumn') ||
            !$this->registerHook('header') ||
            !$this->installdb()
        ) {
            return false;
        }

        return true;
        }

        public function uninstalldb() {

            return Db::getInstance()->Execute('DROP TABLE '._DB_PREFIX_.'testimonials');
        }

        public function uninstall()
        {

            if (!parent::uninstall() ||
            !$this->uninstalldb()
            ) {
                return false;
            }

            return true;
        }
    }
}
