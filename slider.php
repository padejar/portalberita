<?php
$sqlSlider = 'SELECT
berita.id_berita,
berita.judul,
berita.gambar,
berita.teks_berita
FROM
berita
ORDER BY
berita.tgl_posting DESC
LIMIT 0, 4';
$qrySlider = $mysqli->query($sqlSlider) or die($mysqli->error);
$qrySliderNav = $mysqli->query($sqlSlider) or die($mysqli->error);
$counter_slider = 0;

$num = 0;
?>
        <div class="slider">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
      				<!-- Wrapper for slides -->
      				<div class="carousel-inner">
                <?php while ($slider_item = $qrySlider->fetch_array()) { ?>
                  <?php if ($counter_slider == 0) { ?>
        				<div class="item active">
          					<img src="<?php echo $base_url."images/".$slider_item['gambar']; ?>" class="wow fadeIn">
           					<div class="carousel-caption">
            					<h4>
                        <a href="<?php echo $base_url."detail.php?id=".$slider_item['id_berita']."&amp;judul=".
                        strtolower(str_replace(' ', '-', $slider_item['judul'])); ?>">
                          <?php echo $slider_item['judul']; ?>
                        </a>
                      </h4>
           				 		<?php echo substr($slider_item['teks_berita'], 0,200); ?>...
          					</div>
        				</div><!-- End Item -->
                  <?php } else { ?>
                <div class="item">
                    <img src="<?php echo $base_url."images/".$slider_item['gambar']; ?>" class="wow fadeIn">
                    <div class="carousel-caption">
                      <h4>
                         <a href="<?php echo $base_url."detail.php?id=".$slider_item['id_berita']."&amp;judul=".
                        strtolower(str_replace(' ', '-', $slider_item['judul'])); ?>">
                          <?php echo $slider_item['judul']; ?>
                        </a>
                      </h4>
                      <?php echo substr($slider_item['teks_berita'], 0,200); ?>...
                    </div>
                </div><!-- End Item -->
                  <?php } ?>
                  <?php $counter_slider++; ?>
                <?php } ?>
        			</div><!-- End Carousel Inner -->
    				<ul class="list-group col-md-4">

              <?php while ($slider_nav = $qrySliderNav->fetch_array()) { ?>
                <?php if ($num==0) { ?>
      					<li data-target="#myCarousel" data-slide-to="<?php echo $num; ?>" class="list-group-item active">
      						<h4><?php echo $slider_nav['judul']; ?></h4>
      					</li>
                <?php } else { ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $num; ?>" class="list-group-item">
                  <h4><?php echo $slider_nav['judul']; ?></h4>
                </li>
                <?php  } ?>
                <?php $num++; ?>
              <?php } ?>
      			</ul>
      				<!-- Controls -->
      				<div class="carousel-controls">
          				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
            				<span class="glyphicon glyphicon-chevron-left"></span>
          				</a>
          				<a class="right carousel-control" href="#myCarousel" data-slide="next">
            				<span class="glyphicon glyphicon-chevron-right"></span>
          				</a>
      				</div>
    			</div><!-- End Carousel -->
        </div>