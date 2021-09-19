<?php

vc_map(
    array(
        'name' => __('Garbo Category Product', 'js_composer'),
        'base' => 'garbo_category_products',
        'icon' => 'icon-wpb-woocommerce',
        'category' => __('Garbo', 'js_composer'),
        'description' => __('Show multiple products categories by name .', 'js_composer'),
        'params' => array(
            array(
                'type' => 'autocomplete',
                'heading' => __('products categories', 'js_composer'),
                'param_name' => 'ids',
                'settings' => array(
                    'multiple' => true,
                    'sortable' => true,
                    'unique_values' => true,
                ),
                'save_always' => true,
                'description' => __('Enter List of Products', 'js_composer'),
            ),
            array(
                'type' => 'hidden',
                'param_name' => 'skus',
            ),
        ),
    )
);

add_filter('vc_autocomplete_garbo_category_products_ids_callback', 'garbo_category_products_callback', 10, 1); // Get suggestion(find). Must return an array
add_filter('vc_autocomplete_garbo_category_products_ids_render', 'garbo_category_products_render', 10, 1); // Render exact product. Must return an array (label,value)

if (!function_exists('garbo_category_products_render')) {
    function garbo_category_products_render($query)
    {
        $query = $query['value'];
        $cat_id = (int) $query;
        $term = get_term($cat_id, 'product_cat');

        return productCategoryTermOutput($term);
    }
}
if (!function_exists('garbo_category_products_callback')) {
    function garbo_category_products_callback($query)
    {
        global $wpdb;
        $cat_id = (int) $query;
        $query = trim($query);
        $post_meta_infos = $wpdb->get_results($wpdb->prepare("SELECT a.term_id AS id, b.name as name, b.slug AS slug
						FROM {$wpdb->term_taxonomy} AS a
						INNER JOIN {$wpdb->terms} AS b ON b.term_id = a.term_id
						WHERE a.taxonomy = 'product_cat' AND (a.term_id = '%d' OR b.slug LIKE '%%%s%%' OR b.name LIKE '%%%s%%' )", $cat_id > 0 ? $cat_id : -1, stripslashes($query), stripslashes($query)), ARRAY_A);

        $result = array();
        if (is_array($post_meta_infos) && !empty($post_meta_infos)) {
            foreach ($post_meta_infos as $value) {
                $data = array();
                $data['value'] = $slug ? $value['slug'] : $value['id'];
                $data['label'] = __('Id', 'js_composer') . ': ' . $value['id'] . ((strlen($value['name']) > 0) ? ' - ' . __('Name', 'js_composer') . ': ' . $value['name'] : '') . ((strlen($value['slug']) > 0) ? ' - ' . __('Slug', 'js_composer') . ': ' . $value['slug'] : '');
                $result[] = $data;
            }
        }

        return $result;
    }
}

function productCategoryTermOutput($term)
{
    $term_slug = $term->slug;
    $term_title = $term->name;
    $term_id = $term->term_id;

    $term_slug_display = '';
    if (!empty($term_slug)) {
        $term_slug_display = ' - ' . __('Sku', 'js_composer') . ': ' . $term_slug;
    }

    $term_title_display = '';
    if (!empty($term_title)) {
        $term_title_display = ' - ' . __('Title', 'js_composer') . ': ' . $term_title;
    }

    $term_id_display = __('Id', 'js_composer') . ': ' . $term_id;

    $data = array();
    $data['value'] = $term_id;
    $data['label'] = $term_id_display . $term_title_display . $term_slug_display;

    return !empty($data) ? $data : false;
}
