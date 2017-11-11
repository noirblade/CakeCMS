<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo Router::url('/',true); ?></loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <!-- posts-->    
    <?php foreach ($posts as $post):?>
    <url>
        <loc><?php echo $this->Html->url( '/' . Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug($post['Article']['title'], '-') . '/a/' . $post['Article']['id'], true ); ?></loc>
        <lastmod><?php echo $this->Time->toAtom($post['Article']['date_added']); ?></lastmod>
        <priority>0.8</priority>
    </url>
    <?php endforeach; ?>
    <?php foreach ($categories as $cat):?>
    <url>
        <loc><?php echo $this->Html->url( '/'. Inflector::slug(__('psychotherapy')) . '/' . Inflector::slug($cat['Category']['slug'] ? $cat['Category']['slug'] :  $cat['Category']['title'], '-') . '/' . $cat['Category']['id'], true ); ?></loc>
        <lastmod><?php echo $this->Time->toAtom($cat['Category']['date_added']); ?></lastmod>
        <priority>0.8</priority>
    </url>
    <?php endforeach; ?>
</urlset> 
