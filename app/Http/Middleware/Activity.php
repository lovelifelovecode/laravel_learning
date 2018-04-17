<?php
    namespace App\Http\Middleware;
    use Closure;
    class Activity{
        //前置操作
        public function handle($request, Closure $next){
            if(time() < strtotime('2013-05-01')){
                return redirect('activity0');
            }
            return $next($request);
        }

        //后置操作
        /*public function handle($request, Closure $next){
            $response = $next($request);
            dd($response);
        }*/
    }