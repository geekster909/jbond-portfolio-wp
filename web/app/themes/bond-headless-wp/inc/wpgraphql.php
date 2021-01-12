<?php
/**
 * WPGraphQL Modifications.
 *
 * @package  Bond_Headless_WP
 */

// Add isSticky node to post object
add_action('graphql_register_types', function() {
    register_graphql_field('Post', 'isSticky', [
        'type' => 'Boolean',
        'description' => __('Check if post is a sticky post', 'bond-headless-wp'),
        'resolve' => function($post) {
            $isSticky = is_sticky($post->ID);
            return $isSticky;
        }
    ]);
});

// Add onlySticky to GraphQL "where" query
add_action('graphql_register_types', function() {
    register_graphql_field('RootQueryToPostConnectionWhereArgs', 'onlySticky', [
        'type' => 'Boolean',
        'description' => __('Whether to only include sticky posts', 'bond-headless-wp'),
    ]);
});

add_filter('graphql_post_object_connection_query_args', function($query_args, $source, $args, $context, $info) {
    if (isset($args['where']['onlySticky']) && true === $args['where']['onlySticky']) {
        $sticky_ids = get_option('sticky_posts');
        $query_args['posts_per_page'] = count($sticky_ids);
        $query_args['post__in'] = $sticky_ids;
    }
    return $query_args;
}, 10, 5);
