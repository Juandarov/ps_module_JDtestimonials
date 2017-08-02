<?php
class AdminJDTestimonialsController extends ModuleAdminController {
    public function __construct()
    {
        $this->table = 'testimonials';
        $this->className = 'TestimonialPost';
        $this->context = Context::getContext();
        $this->bootstrap = true;
        $this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));
        $this->fields_list = array(
            'id_testimonials' => array(
                'title' => $this->l('id'),
                'width' => 140,
                'type' => 'int',
            ),
            'author' => array(
                'title' => $this->l('Author'),
                'width' => 140,
                'type' => 'text',
            ),
            'body' => array(
                'title' => $this->l('Description'),
                'width' => 140,
                'type' => 'text',
                )
            );

        $this->fields_form = array(
            'legend' => array(
                'title' => $this->l('Testimonials'),
            ),
            'input' => array(
                array(
                    'label' => $this->l('Author'),
                    'type' => 'text',
                    'name' => 'author',
                ),
                array(
                    'label' => $this->l('Description'),
                    'type' => 'text',
                    'name' => 'body',
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right'
                )
            );

            parent::__construct();
        }

        public function renderList() {

            $this->addRowAction('edit');
            $this->addRowAction('delete');

            return parent::renderList();
        }
    }
