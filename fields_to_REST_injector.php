<?php

class fields_to_REST_injector
{
    private $client_fields = array('phone', 'location', 'subscription_type', 'subscription_start_date', 'subscription_end_date', 'seller');
    private $order_fields = array('order_number', 'due_date', 'amount', 'state');
    private $installment_fields = array('client', 'amount', 'state');

    private $all_fields;

    public function __construct()
    {
        $this->all_fields = array_merge($this->client_fields, $this->order_fields, $this->installment_fields);
        add_action('rest_api_init', array($this, 'register_post_custom_field'));

    }

    function register_post_custom_field()
    {
        foreach ($this->all_fields as $field) {
            register_rest_field('clients',
                $field,
                array(
                    'get_callback' => array($this, 'get_custom_field'),
                    'update_callback' => null,
                    'schema' => null,
                )
            );
        }
    }

    function get_custom_field($object, $field_name, $request)
    {
        return get_post_meta($object['id'], $field_name, true);
    }
}

new fields_to_REST_injector();