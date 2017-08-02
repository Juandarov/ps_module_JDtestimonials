<?php
class jdtestimonialstestimonial_detailModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        $this->setTemplate('testimonials_detail.tpl');

        $testimonials_id = Tools::getValue('id');
        $sql = new DbQuery();
        $sql->select('*');
        $sql->from('testimonials');
        $sql->where('id_testimonials ='.$testimonials_id);

        $testimonials = Db::getInstance()->executeS($sql);

        if ($testimonials) {
            $this->context->smarty->assign(array('testimonials' => $testimonials));
        }

    }
}
