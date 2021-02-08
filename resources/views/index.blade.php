<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Quotes list</title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('js/modal.js') }}"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="header_block">
                    <div class="add_quote">
                        <a href="#openModal">Добавить цитату</a>
                    </div>
                </div>
            </div>
            <div class="quotes_block">

            @if (session('status'))
                <div class="success-message">
                    {{ session('status') }}
                </div>
                <div class="homelink">
                    <a href="/">К списку цитат</a>
                </div>
            @else
                <h1>Онлайн цитатник</h1>
            @if($quotes->count())
                @foreach($quotes as $quote)
                    <blockquote class="blockquote-5">
                        <p>{{ $quote->text }}</p>
                        <footer>
                            <cite><strong>Автор:</strong> {{ $quote->author }} ({{ $quote->created_at }})</cite>
                            <p class="tags">Теги:
                            @foreach($quote->tags as $tag)
                                <a href="#">{{ "#".$tag->name }}</a>
                            @endforeach
                            </p>
                        </footer>
                    </blockquote>
                @endforeach
            @endif
            <div class="pagination">
                {{ $quotes->render("pagination::bootstrap-4") }}
            </div>
            </div>
            @endif
        </div>
        <div id="openModal" class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">Добавить цитату</h3>
                <a href="#close" title="Close" class="close">×</a>
              </div>
              <div class="modal-body">    
                <form method="post" action="/add" id="add-form">
                    {{csrf_field()}}
                  <ul class="flex-outer">
                    <li>
                      <label for="name">Автор</label>
                      <input type="text" id="author" name="author" placeholder="Имя автора" required>
                    </li>
                    <li>
                      <label for="quote">Цитата</label>
                      <textarea rows="6" id="quote" name="quote" placeholder="Введите цитату" required></textarea>
                    </li>
                    <li>
                      <p>Теги</p>
                      <ul class="flex-inner">
                        <ul class="flex-inner">
                            @foreach($tags as $tag)
                                    <li>
                                        <input type="checkbox" id="{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
                                        <label for="{{ $tag->id }}">{{ $tag->name }}</label>
                                      </li>
                            @endforeach
                          <!-- more list items here -->
                        </ul>
                      </ul>
                    </li>
                    <li>
                      <button type="submit">Добавить</button>
                    </li>
                  </ul>
                </form>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>
