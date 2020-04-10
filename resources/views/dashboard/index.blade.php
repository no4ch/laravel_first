@extends('dashboard.layouts.default')

@section('title', 'Dashboard')

@section('dashboard-content')
  @parent
  <div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
    <h1 class="h2">Dashboard</h1>
  </div>

  @if(!empty($tests))
    <div class="pb-3">
      <a class="btn btn-primary btn-lg" href="{{ route('dashboard.tests.create') }}" role="button">Add Test</a>
    </div>

    <div class="container-fluid">
      <table class="table table-striped">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Test name</th>

          <th scope="col">Updated at</th>
          <th scope="col">Actions</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse($tests as $test)
          <tr>
            <td>{{ $test->id }}</td>
            <td>{{ $test->name }}</td>

            <td>{{ $test->updated_at }}</td>
            <td>
              <a class="badge badge-primary pl-2 pr-2 pt-1 pb-1" href="{{ route('dashboard.tests.edit', $test->id) }}">Edit</a>
              <form id="destroy-form" action="{{ route('dashboard.tests.destroy', $test->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="badge badge-danger pl-2 pr-2 pt-1 pb-1" type="submit">Delete</button>
              </form>
            </td>
            <td>
              <a class="" data-toggle="collapse" href="#collapse{{ $loop->index }}" role="button"
                 aria-expanded="false" aria-controls="collapse{{ $loop->index }}">
                Show questions
              </a>
            </td>
          </tr>
          <tr>
            <td colspan="5">
              <div class="collapse" id="collapse{{ $loop->index }}">
                <div class="card card-body">
                  <div class="pb-3">
                    <a class="btn btn-primary btn-lg" href="{{ route("dashboard.tests.questions.create", $test->id) }}"
                       role="button">Add question</a>
                  </div>
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Questions</th>
                      <th scope="col">Updated at</th>
                      <th scope="col">Actions</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($test->questions as $question)
                      <tr>
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->updated_at }}</td>
                        <td>
                          <a class="badge badge-primary pl-2 pr-2 pt-1 pb-1"
                             href="{{ route('dashboard.questions.edit', $question->id) }}">Edit</a>
                          <form id="destroy-form" action="{{ route('dashboard.questions.destroy', $question->id) }}"
                                method="POST">
                            @csrf
                            @method('delete')
                            <button class="badge badge-danger pl-2 pr-2 pt-1 pb-1" type="submit">Delete</button>
                          </form>
                        </td>
                        <td>
                          <a class="" data-toggle="collapse" href="#collapseQuestion{{ $loop->index }}" role="button"
                             aria-expanded="false" aria-controls="collapseQuestion{{ $loop->index }}">
                            Show answers
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="5">
                          <div class="collapse" id="collapseQuestion{{ $loop->index }}">
                            <div class="card card-body">
                              <table class="table table-striped">
                                <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Answers</th>
                                  <th scope="col">Updated at</th>
                                  <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($question->answers as $answer)
                                  <tr>
                                    <td>{{ $answer->id }}</td>
                                    <td>{{ $answer->answer }}</td>
                                    <td>{{ $answer->updated_at }}</td>
                                    <td>
                                      <a class="badge badge-primary pl-2 pr-2 pt-1 pb-1"
                                         href="{{ route('dashboard.answers.edit', $answer->id) }}">Edit</a>
                                      <form id="destroy-form"
                                            action="{{ route('dashboard.answers.destroy', $answer->id) }}"
                                            method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="badge badge-danger pl-2 pr-2 pt-1 pb-1" type="submit">Delete
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                                @empty
                                  <p>Ответов к данному вопросу пока не добавлено</p>
                                @endforelse
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @empty
                      <p>Вопросы еще не были добавлены в данный тест</p>
                    @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </td>
          </tr>
        @empty
        @endforelse
        </tbody>
      </table>

      {{ $tests->links() }}
    </div>
  @else
    <div class="p-3 mb-2 bg-primary text-white">
      <h2>Тесты не были загружены</h2>
    </div>
  @endif
@endsection
