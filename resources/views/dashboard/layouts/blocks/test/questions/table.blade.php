<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Питання</th>
        <th scope="col">Обновлене в</th>
        <th scope="col">Дії</th>
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
                   href="{{ route('dashboard.questions.edit', $question->id) }}">Редагувати</a>
                <form id="destroy-form" action="{{ route('dashboard.questions.destroy', $question->id) }}"
                      method="POST">
                    @csrf
                    @method('delete')
                    <button class="badge badge-danger pl-2 pr-2 pt-1 pb-1" type="submit">Видалити</button>
                </form>
            </td>
            <td>
                <a class="" data-toggle="collapse" href="#collapseQuestion{{ $loop->index }}" role="button"
                   aria-expanded="false" aria-controls="collapseQuestion{{ $loop->index }}">
                    Показати відповіді
                </a>
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <div class="collapse" id="collapseQuestion{{ $loop->index }}">
                    <div class="card card-body">
                        <div class="pb-3">
                            @if($question->file['path'])
                            <img src="/storage/{{ $question->file['path'] }}" alt="" style="max-width: 100%; max-height: 400px;">
                            <br>
                            @endif
                            <a class="btn btn-primary btn-lg mt-2" href="{{ route("dashboard.questions.answers.create", $question->id) }}"
                               role="button">Додати відповідь</a>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Відповіді</th>
                                <th scope="col">Обновлені в</th>
                                <th>Дії</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($question->answers as $answer)
                                <tr {{ $answer->status!=='true'?:"class=bg-success" }}>
                                    <td>{{ $answer->id }}</td>
                                    <td>{{ $answer->answer }}</td>
                                    <td>{{ $answer->updated_at }}</td>
                                    <td>
                                        <a class="badge badge-primary pl-2 pr-2 pt-1 pb-1"
                                           href="{{ route('dashboard.answers.edit', $answer->id) }}">Редагувати</a>
                                        <form id="destroy-form"
                                              action="{{ route('dashboard.answers.destroy', $answer->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="badge badge-danger pl-2 pr-2 pt-1 pb-1" type="submit">Видалити
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <p>Відповіді для обранного питання ще не додані</p>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </td>
        </tr>

    @empty
        <p>Питання ще не були додані до цього тесту</p>
    @endforelse
    </tbody>
</table>
