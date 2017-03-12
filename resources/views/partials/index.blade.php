    <div class="container">
        <div class="row">
            <div class="form-group col-md-5 button-group">
                <input type="text" name="quicksearch" class="quicksearch form-control" data-filter=".quicksearch" placeholder="Search" autofocus />
            </div>
        </div>
        <div class="row">
            <div id="status-filters" class="button-group col-md-5">
                <h3>Status</h3>
                <button class="button is-checked" data-filter="*">Show All</button>
                <button id="incomplete-btn" class="button" data-filter=".incomplete">Incomplete</button>
                <button id="complete-btn" class="button" data-filter=".complete">Complete</button>
                <button class="button" data-filter=".on-hold">On hold</button>
            </div>
            <div id="priority-filters" class="button-group col-md-5">
                <h3>Priority</h3>
                <button class="button is-checked" data-filter="*">Show All</button>
                <button class="button" data-filter=".priority-1">Priority 1</button>
                <button class="button" data-filter=".priority-2">Priority 2</button>
                <button class="button" data-filter=".priority-3">Priority 3</button>
            </div>
            <div id="category-filters" class="button-group col-md-5">
                <h3>Category</h3>
                <button class="button is-checked" data-filter="*">Show All</button>
                <button class="button" data-filter=".category-web">Web</button>
                <button class="button" data-filter=".category-creative">Creative</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="grid">
            <div class="row">
                <div class="grid-sizer"></div>
                @foreach($tickets as $tt)
                    <div id="box{{ $tt->id }}" class="grid-item{{ $tt->complete ? ' complete' : ' incomplete' }} priority-{{ $tt->priority }} {{$tt->status == 'On Hold' ? 'on-hold': ''}} category-{{ strtolower($tt->category) }}" data-category="{{ $tt->company }}">
                        <div id="ticket{{ $tt->id }}" class="box box-{{$tt->complete ? 'success' : 'danger'}}">
                            <div class="box-header with-border">
                                <div class="box-title">
                                    <h3>
                                        Trouble Ticket #{{ $tt->id }}
                                    </h3>
                                </div>
                            </div>
                            <div class="box-body">
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Company:</strong> {{ $tt->company }}</a></li>
                                    <li class="list-group-item"><strong>Title: </strong> {{ $tt->title }}</li>
                                    <li class="list-group-item"><strong>Description:</strong> {{ $tt->description }}</li>
                                    <li id="status{{$tt->id}}" class="list-group-item"><strong>Status:</strong> {{ $tt->status }} </li>
                                    <li id="category{{$tt->id}}" class="list-group-item"><strong>Category:</strong> {{ $tt->category }} </li>
                                    <li class="list-group-item"><strong>Priority:</strong> {{ $tt->priority }}</li>
                                    <li class="list-group-item"><strong>Created:</strong> {{ $tt->created_at->diffForHumans() }}</li>
                                    @if($tt->supportingFiles->count())
                                    <li class="list-group-item"><strong>Attachments:</strong>
                                    <dl>
                                        @foreach($tt->supportingFiles as $sf)

                                            <li class="list-group-item no-border"><a href="{{ asset($sf->path) }}">{{ $sf->original_name }}</a></li>
                                        @endforeach
                                    </dl>
                                    </li>
                                    @endif
                                </ul>
                                <a href="/ticket/{{ $tt->id }}/edit" class="btn btn-info btn-full-width">Edit this ticket</a>
                                @if($tt->comments->count())
                                    <a class="btn btn-full-width btn-warning" id="ticket-comment-{{$tt->id}}" role="button" data-toggle="collapse" href="#ticket-{{ $tt->id }}-comment" aria-expanded="false" aria-controls="ticket-{{ $tt->id }}-comment">View Comments</a>
                                    <div class="collapse collaspe-target" id="ticket-{{ $tt->id }}-comment">
                                      <div class="well">
                                          <ul>
                                            @foreach( $tt->comments as $comment)
                                                <li>{{ $comment->body }}</li>
                                                <li>Time Spent: {{ $comment->time_spent }} hrs</li>
                                                <li>By: {{ App\User::find($comment->user_id)->name }}</li>
                                            @endforeach
                                        </ul>
                                      </div>
                                    </div>
                                @endif
                                @unless($tt->complete)
                                    <form action="/complete/{{ $tt->id }}" id="complete{{ $tt->id }}" method="post" class="mark-complete">
                                        {{ method_field('PATCH') }}
                                        {{ csrf_field() }}
                                        <input type="hidden" class="get-id" value="{{ $tt->id }}">
                                           <div class="form-group">
                                               <button type="submit" class="btn btn-danger btn-full-width">Mark Complete</button>
                                           </div> 
                                    </form>
                               @endunless
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Comments</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" role="form" id="comment-modal"> 
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
                    <input type="hidden" name="trouble_ticket_id" id="trouble_ticket_id">
                    <input type="hidden" name="company" id="company_id">
                    <h3 id="company_name"></h3>
                      <div class="form-group">
                          <label for="Project">Project</label>
                          <select name="project" class="form-control" id="projects">
                              {{-- JQuery here --}}
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="task">Task</label>
                          <select name="task" class="form-control" id="tasks">
                          @foreach(App\Task::all() as $task)
                              <option value="{{ $task->id }}">{{ $task->name }}</option>
                          @endforeach
                          </select>
                      </div>
                        <div class="form-group">
                            <label for="body">Comment:</label>
                            <textarea name="body" id="inputBody" class="form-control" required="required">Resolved issue</textarea>
                        </div>
                        <div class="form-group">
                            <label for="time_spent">Time Spent</label>
                            <input type="text" name="time_spent" id="inputTimeSpent" class="form-control" value=".25" required="required" pattern="[0-9]?[0-9]?(\.[0-9][0-9]?)?">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
