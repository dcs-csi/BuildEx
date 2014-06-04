<ul class="off-canvas-list">
    <li><label><?php echo SITE_NAME; ?> - Faculty</label></li>
    <li><?php echo anchor(page_path(), 'Home'); ?></li>
    <li><?php echo anchor(page_path(''), 'Profile'); ?></li>
    
    <li><label>Records</label></li>
    <li><?php echo anchor('faculty/'.role_id().'/experiments', 'Experiments'); ?></li>
    <li><?php echo anchor('faculty/'.role_id().'/advisories', 'Advisory Experiments'); ?></li>
    <li><?php echo anchor('faculty/'.role_id().'/archives', 'Archives'); ?></li>

    <li><label>Laboratories</label></li>
    <li><?php echo anchor('faculty/'.role_id().'/laboratory', 'My Laboratory'); ?></li>
    <li><?php echo anchor('explore', 'Explore'); ?></li> 
</ul>
