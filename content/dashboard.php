<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>หน้าแรก</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/pages/main.php?path=dashboard">หน้าแรก</a></li>
          <li class="breadcrumb-item active">หน้าหลัก</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3> <?= KTgetData::getNumberBoxInDashboard($conn, 'numberofstudents', $classTeacher) != NULL ?  KTgetData::getNumberBoxInDashboard($conn, 'numberofstudents', $classTeacher) : '0'; ?><sup style="font-size: 20px"></sup></h3>
            <p>จำนวนนักเรียนขั้นประถมศึกษาปีที่ <?= $classTeacher; ?></p>
          </div>

          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="#" class="small-box-footer  "> Total number of classes </a>
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3> <?= KTgetData::getNumberBoxInDashboard($conn, 'sumAmountByDay', date('Y-m-d')) != NULL ? number_format(KTgetData::getNumberBoxInDashboard($conn, 'sumAmountByDay', date('Y-m-d'))) : '0'; ?></h3>
            <p>ยอดรวมเงินฝากในวันนี้ </p>
          </div>
          <div class="icon">
            <i class="nav-icon fas fa-coins"></i>
          </div>
          <a href="#" class="small-box-footer"> Today's total deposit</a>
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3> <?= KTgetData::getNumberBoxInDashboard($conn, 'sumAmountAll', $classTeacher) != NULL ?  number_format(KTgetData::getNumberBoxInDashboard($conn, 'sumAmountAll', $classTeacher)) : '0'; ?></h3>
            <p>ยอดรวมเงินฝากทั้งหมด</p>
          </div>
          <div class="icon">
            <i class="fas fa-landmark"></i>
          </div>
          <a href="#" class="small-box-footer"> Total amount of all depoits</a>
        </div>
      </div>
    </div>


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class=" sticky-top mb-3">
            <div id="external-events"> </div>
          </div>
        </div>
      </div>
    </section>
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-body p-0">
            <div id="calendar"></div>
          </div>
        </div>
      </div>




      <!-- TO DO List -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-bold">
              <i class="ion ion-clipboard mr-1"></i>
              จำนวนการฝากเงินนักเรียนเรียงตามลำดับ
            </h3>
          </div>
          <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 50%">ชื่อ-สกุล</th>
                  <th style="width: 25%">จำนวนเงินฝาก</th>
                  <th style="width: 25%">ลำดับที่</th>
                </tr>
              </thead>
              <tbody>

                <?PHP
                $gettopSQL = "SELECT * FROM list_students WHERE ls_class = '$classTeacher' ORDER BY ls_balance DESC LIMIT 10";
                $gettopARR = mysqli_query($conn, $gettopSQL);
                $gettopNUM = mysqli_num_rows($gettopARR);
                if ($gettopNUM > 0) {
                  $i = 1;

                  foreach ($gettopARR as $gettop) {
                    $topfullname = $gettop['ls_prefix'] . ' ' .  $gettop['ls_fname'] . ' ' . $gettop['ls_lname'];
                    // echo "<pre>";
                    // print_r($gettop);
                    // echo "</pre>";
                ?>
                    <tr>
                      <td><?= $topfullname; ?> </td>
                      <td><?= number_format($gettop['ls_balance']); ?></td>
                      <td><?= $i; ?></td>
                    </tr>

                <?PHP
                    $i++;
                  }
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>




      </div>


    </div>
</section>

<script>
  $(function() {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function() {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0 //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue(
            'background-color'),
          borderColor: window.getComputedStyle(eventEl, null).getPropertyValue(
            'background-color'),
          textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [


      ],
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar !!!
      drop: function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });


    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function(e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color': currColor
      })
    })
    $('#add-new-event').click(function(e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color': currColor,
        'color': '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>