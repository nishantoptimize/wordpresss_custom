<?php
//Template Name: category posts
session_start();

define('WP_USE_THEMES', false);
require_once('D:\xamp\htdocs\wordpress_dashbord\wp-load.php');

get_header();

$category = $_GET['category'] ?? '';

$args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'category_name'  => $category,
);

$query = new WP_Query($args);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $category; ?> Posts</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .post-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .post-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .post-card .post-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .post-card .post-excerpt {
            color: #666;
            line-height: 1.5;
        }

        .post-card a {
            text-decoration: none;
            color: #007bff;
            display: block;
            margin-top: 10px;
        }

        .post-card a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><?php echo $category; ?> Posts</h1>
        <?php
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
        ?>
                <div class='post-card'>
                    <a href='<?php the_permalink(); ?>'><img src='<?php echo get_the_post_thumbnail_url(); ?>' style='height:500px' alt='<?php the_title(); ?>' /></a>
                    <div class='post-title'><?php the_title(); ?></div>
                    <div class='post-excerpt'><?php the_excerpt(); ?></div>
                    <a href='<?php the_permalink(); ?>'>Read more</a>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo "<p>No posts found for this category.</p>";
        endif;
        ?>
    </div>
    <?php get_footer(); ?>
</body>

</html>
