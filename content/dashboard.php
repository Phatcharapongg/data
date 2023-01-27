<?PHP

?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>หน้าแรก</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= $_SESSION['uri']; ?>/<?= $path; ?>/pages/main?path=dashboard">หน้าแรก</a></li>
          <li class="breadcrumb-item active">หน้าหลัก</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3> 3 <sup style="font-size: 20px"></sup></h3>
            <p>จำนวนนักเรียนขั้นประถมศึกษาปีที่....1/1</p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="#" class="small-box-footer  "> Total number of classes </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>1</h3>
            <h3>
              <p>จำนวนรายการฝาก-ถอนเงินภายในวันนี้</p>
            </h3>
          </div>
          <div class="icon">
            <i class="	fas fa-user-clock"></i>
          </div>
          <a href="#" class="small-box-footer text-bold">
            Today's deposit-withdrawal list</a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>1000</h3>
            <p>ยอดรวมเงินฝากในวันนี้ </p>
          </div>
          <div class="icon">
            <i class="nav-icon fas fa-coins"></i>
          </div>
          <a href="#" class="small-box-footer"> Today's total deposit</a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>1500</h3>
            <p>ยอดรวมเงินฝากทั้งหมด</p>
          </div>
          <div class="icon">
            <i class="fas fa-landmark"></i>
          </div>
          <a href="#" class="small-box-footer"> Total amount of all deposits</a>
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
            <h3 class="card-title">
              <i class="ion ion-clipboard mr-1"></i>
              To Do List
            </h3>

            <div class="card-tools">
              <ul class="pagination pagination-sm">
                <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                <li class="page-item"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <ul class="todo-list" data-widget="todo-list">
              <li>
                <!-- drag handle -->
                <span class="handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <!-- checkbox -->
                <div class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo1" id="todoCheck1">
                  <label for="todoCheck1"></label>
                </div>
                <!-- todo text -->
                <span class="text">Design a nice theme</span>
                <!-- Emphasis label -->
                <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                <!-- General tools such as edit or delete-->
                <div class="tools">
                  <i class="fas fa-edit"></i>
                  <i class="fas fa-trash-o"></i>
                </div>
              </li>
              <li>
                <span class="handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <div class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                  <label for="todoCheck2"></label>
                </div>
                <span class="text">Make the theme responsive</span>
                <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                <div class="tools">
                  <i class="fas fa-edit"></i>
                  <i class="fas fa-trash-o"></i>
                </div>
              </li>
              <li>
                <span class="handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <div class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo3" id="todoCheck3">
                  <label for="todoCheck3"></label>
                </div>
                <span class="text">Let theme shine like a star</span>
                <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                <div class="tools">
                  <i class="fas fa-edit"></i>
                  <i class="fas fa-trash-o"></i>
                </div>
              </li>
              <li>
                <span class="handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <div class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo4" id="todoCheck4">
                  <label for="todoCheck4"></label>
                </div>
                <span class="text">Let theme shine like a star</span>
                <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                <div class="tools">
                  <i class="fas fa-edit"></i>
                  <i class="fas fa-trash-o"></i>
                </div>
              </li>
              <li>
                <span class="handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <div class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo5" id="todoCheck5">
                  <label for="todoCheck5"></label>
                </div>
                <span class="text">Check your messages and notifications</span>
                <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                <div class="tools">
                  <i class="fas fa-edit"></i>
                  <i class="fas fa-trash-o"></i>
                </div>
              </li>
              <li>
                <span class="handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <div class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo6" id="todoCheck6">
                  <label for="todoCheck6"></label>
                </div>
                <span class="text">Let theme shine like a star</span>
                <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                <div class="tools">
                  <i class="fas fa-edit"></i>
                  <i class="fas fa-trash-o"></i>
                </div>
              </li>
            </ul>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add
              item</button>
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