<div class="row">
    <div class="col-md-12">
        <div class="copyright">
            <p>Copyright © 2020 FG13. All rights reserved.</p>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>

</div>

<!-- Jquery JS-->
<script src="<?= base_url() ?>assets/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="<?= base_url() ?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="<?= base_url() ?>assets/vendor/slick/slick.min.js">
</script>
<script src="<?= base_url() ?>assets/vendor/wow/wow.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/animsition/animsition.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="<?= base_url() ?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="<?= base_url() ?>assets/vendor/circle-progress/circle-progress.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= base_url() ?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/select2/select2.min.js">
</script>


<!-- full calendar requires moment along jquery which is included above -->
<script src="<?= base_url() ?>assets/vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/fullcalendar-3.10.0/fullcalendar.js"></script>

<!-- Main JS-->
<script src="<?= base_url() ?>assets/js/main.js"></script>
<script type="text/javascript">
    $(function() {
        // for now, there is something adding a click handler to 'a'
        var tues = moment().day(2).hour(19);

        // build trival night events for example data
        var events = [{
                title: "Inspeksi Harian",
                start: moment().format('YYYY-MM-DD'),
                url: '#'
            },
            {
                title: "Doctor Appt",
                start: moment().hour(9).add(2, 'days').toISOString(),
                url: '#'
            }

        ];

        var trivia_nights = []

        for (var i = 1; i <= 4; i++) {
            var n = tues.clone().add(i, 'weeks');
            console.log("isoString: " + n.toISOString());
            trivia_nights.push({
                title: 'Trival Night @ Pub XYZ',
                start: n.toISOString(),
                allDay: false,
                url: '#'
            });
        }

        // setup a few events
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            events: events.concat(trivia_nights)
        });
    });
</script>
<script>
  $(document).ready(function() {
    $('#P3K').hide();
    $('#Apar').hide();
    $('#FireAlarm').hide();
    $('#Hidran').hide();
    $('#SHK').hide();

    $('#inspeksi').on('change', function() {
      var a = $(this).val();
      if (a == "P3K") {
        $('#harian').hide();
        $('#P3K').show();
        $('#Apar').hide();
        $('#FireAlarm').hide();
        $('#Hidran').hide();
        $('#SHK').hide();

      } else if (a == "Apar") {
        $('#harian').hide();
        $('#P3K').hide();
        $('#Apar').show();
        $('#FireAlarm').hide();
        $('#Hidran').hide();
        $('#SHK').hide();

      }else if (a == "FireAlarm") {
        $('#harian').hide();
        $('#P3K').hide();
        $('#Apar').hide();
        $('#FireAlarm').show();
        $('#Hidran').hide();
        $('#SHK').hide();

      }else if (a == "Hidran") {
        $('#harian').hide();
        $('#P3K').hide();
        $('#Apar').hide();
        $('#FireAlarm').hide();
        $('#Hidran').show();
        $('#SHK').hide();

      }else if (a == "SHK") {
        $('#harian').hide();
        $('#P3K').hide();
        $('#Apar').hide();
        $('#FireAlarm').hide();
        $('#Hidran').hide();
        $('#SHK').show();
      }else {
        $('#harian').show();
        $('#P3K').hide();
        $('#Apar').hide();
        $('#FireAlarm').hide();
        $('#Hidran').hide();
        $('#SHK').hide();
      }
    });
  });
</script>
</body>

</html>
<!-- end document-->