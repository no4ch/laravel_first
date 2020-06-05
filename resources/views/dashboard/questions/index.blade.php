@extends('dashboard.layouts.default')

@section('title', 'Питання')

@section('dashboard-content')

  <div class="">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Адмінка</a></li>
        <li class="breadcrumb-item active" aria-current="page">Питання</li>
      </ol>
    </nav>

    <div class="jumbotron">
      <h1 class="display-4">Питання</h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to
                      featured content or information.</p>
      <a class="btn btn-primary btn-lg" href="{{ route('dashboard.questions.create') }}" role="button">Додати питання</a>
    </div>

    <table class="table table-striped">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Ім'я тесту</th>
        <th scope="col">Descr</th>
        <th scope="col">Created at</th>
        <th></th>
      </tr>
      </thead>
      <tbody>
      @forelse($questions as $question)
        <tr>
          <td>{{ $question->id }}</td>
          <td>{{ $question->name }}</td>
          <td>{{ $question->description??"Описание отсутствует" }}</td>
          <td>{{ $question->created_at }}</td>
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
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Questions</th>
                    <th scope="col">Created at</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  @forelse($question->questions as $q)
                    <tr>
                      <td>{{ $q->id }}</td>
                      <td>{{ $q->question }}</td>
                      <td>{{ $q->created_at }}</td>
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
                                <th scope="col">Created at</th>

                              </tr>
                              </thead>
                              <tbody>
                              @forelse($q->answers as $answer)
                                <tr>
                                  <td>{{ $answer->id }}</td>
                                  <td>{{ $answer->answer }}</td>
                                  <td>{{ $answer->created_at }}</td>
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


    {{ $questions->links() }}
  </div>
@endsection
