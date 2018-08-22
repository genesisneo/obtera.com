      <footer class="pb-3">

        <div class="container py-3">

          <section class="row">

            <?php get_template_part('/src/components/footer', 'info'); ?>

            <?php get_template_part('/src/components/footer', 'popular-posts'); ?>

            <?php get_template_part('/src/components/footer', 'popular-categories'); ?>

          </section>

          <hr>

          <div class="row">
            <aside class="col-12 mb-3 pb-3 text-center text-md-left copyright">
              <small>Copyright &copy; <?php echo date("Y"); ?>. Obtera.com. All rights reserved.</small>
            </aside>
          </div>

        </div>

      </footer>

    </div>

  <?php wp_footer(); ?>

  </body>
  
</html>
