<?php
  namespace App\Filters;

  use CodeIgniter\Filters\FilterInterface;
  use CodeIgniter\HTTP\RequestInterface;
  use CodeIgniter\HTTP\ResponseInterface;

  class RecaptchaFilter implements FilterInterface
  {
      public function before(RequestInterface $request, $arguments = null)
      {
          $response = $request->getPost('g-recaptcha-response');
          $secret = '6Ld4Sg4rAAAAAE1nGe80M7AlpQEpKbRJx1moGC4K';
          $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
          $verify = json_decode($verify);

          if (!$verify->success) {
              return redirect()->back()->with('error', 'فشل التحقق من reCAPTCHA!');
          }
      }

      public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
      {
          // لا حاجة لتنفيذ أي شيء هنا
      }
  }