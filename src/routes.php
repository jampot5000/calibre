<?php

use Jampot5000\Calibre\Models\Book;
use Symfony\Component\HttpKernel\Exception\HttpException;

// @todo: extract this out to a class, allowing finer control
if (app()->config['calibre']['registerRoute'] == 'true') {
    Route::get(
        app()->config['calibre']['route'],
        function ($id, $format) {
            $bookMimes = [
                'epub' => 'application/epub+zip',
                'mobi' => 'application/x-mobipocket-ebook',
            ];
            try {
                $url = Book::findorFail($id)
                    ->files()
                    ->where('format', $format)
                    ->first()
                    ->path;

                $response = response()->download($url);
                $response->headers->set('Content-Type', $bookMimes[\Illuminate\Support\Str::lower($format)]);
            } catch (Exception $e) {
                throw new HttpException('404');
            }

            return $response;

        }
    );
}
