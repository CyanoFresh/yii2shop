<?php
/* @var $this yii\web\View */
/* @var $urls */
echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php foreach ($urls as $url): ?>
        <url>
            <loc><?= $url ?></loc>
            <changefreq>daily</changefreq>
        </url>
    <?php endforeach ?>
</urlset>