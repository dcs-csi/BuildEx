<div class="fixed show-for-medium-up">
    <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name">
                <h1><a href="<?php echo site_url(); ?>"><div class="icon" style="display:inline"><span>&nbsp;</span></div><strong>CS 192</strong></a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
        </ul>

        <section class="top-bar-section">
            <!-- Right Nav Section -->
            <ul class="right">
                <li><a href="<?php echo site_url($this->session->userdata('active_role').'/profile'); ?>" ><? echo $this->session->userdata('username'); ?></a></li>
                <li><a href="<?php echo site_url('home/logout') ?>"> Logout </a></li>
            </ul>
        </section>
    </nav>
</div>