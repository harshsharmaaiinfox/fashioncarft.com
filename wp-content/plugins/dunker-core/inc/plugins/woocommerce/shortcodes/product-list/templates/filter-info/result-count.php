<div class="qodef-product-list-result-count">
    <?php

    $args = array(
        'total'    => $query_result->found_posts,
        'per_page' => $query_result->query['posts_per_page'],
        'current'  => 1, //ToDo
    );

    wc_get_template( 'loop/result-count.php', $args );
    ?>
</div>