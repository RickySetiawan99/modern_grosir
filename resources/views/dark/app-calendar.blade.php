@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')
@section('theme', 'dark')

@section('pageContent')

          @include('layouts.breadcrumb', ['title' => 'Calendar', 'subtitle' => 'Home'])

          <div class="card">
            <div class="card-body calender-sidebar app-calendar">
              <div id="calendar"></div>
            </div>
          </div>
          <!-- BEGIN MODAL -->
          <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="eventModalLabel">
                    Add / Edit Event
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div>
                        <label class="form-label">Event Title</label>
                        <input id="event-title" type="text" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-12 mt-6">
                      <div><label class="form-label">Event Color</label></div>
                      <div class="d-flex">
                        <div class="n-chk">
                          <div class="form-check form-check-primary form-check-inline">
                            <input class="form-check-input" type="radio" name="event-level" value="Danger"
                              id="modalDanger" />
                            <label class="form-check-label" for="modalDanger">Danger</label>
                          </div>
                        </div>
                        <div class="n-chk">
                          <div class="form-check form-check-warning form-check-inline">
                            <input class="form-check-input" type="radio" name="event-level" value="Success"
                              id="modalSuccess" />
                            <label class="form-check-label" for="modalSuccess">Success</label>
                          </div>
                        </div>
                        <div class="n-chk">
                          <div class="form-check form-check-success form-check-inline">
                            <input class="form-check-input" type="radio" name="event-level" value="Primary"
                              id="modalPrimary" />
                            <label class="form-check-label" for="modalPrimary">Primary</label>
                          </div>
                        </div>
                        <div class="n-chk">
                          <div class="form-check form-check-danger form-check-inline">
                            <input class="form-check-input" type="radio" name="event-level" value="Warning"
                              id="modalWarning" />
                            <label class="form-check-label" for="modalWarning">Warning</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12 mt-6">
                      <div>
                        <label class="form-label">Enter Start Date</label>
                        <input id="event-start-date" type="date" class="form-control" />
                      </div>
                    </div>

                    <div class="col-md-12 mt-6">
                      <div>
                        <label class="form-label">Enter End Date</label>
                        <input id="event-end-date" type="date" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn bg-danger-subtle text-danger" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="button" class="btn btn-success btn-update-event" data-fc-event-public-id="">
                    Update changes
                  </button>
                  <button type="button" class="btn btn-primary btn-add-event">
                    Add Event
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- END MODAL -->
        
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/libs/fullcalendar/index.global.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/apps/calendar-init.js') }}"></script>
@endsection