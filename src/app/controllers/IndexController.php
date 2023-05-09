<?php

use Phalcon\Mvc\Controller;
// defalut controller view
class IndexController extends Controller
{
    public function indexAction()
    {
        // default action
    }
    public function getU($city, $type)
    {

        if ($type == "/history.json") {
            $date = "2023-05-05";
            $end = "2023-05-08";
        $u = "http://api.weatherapi.com/v1" . $type . "?key=0bab7dd1bacc418689b143833220304&q="
         . $city . "&dt=" . $date . "&end_dt=" . $end;

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $u);

            $result = json_decode(curl_exec($ch), true);
            curl_close($ch);


            return $result;
        } else {
            $u = "http://api.weatherapi.com/v1" . $type . "?key=0bab7dd1bacc418689b143833220304&q=" . $city . "";

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $u);

            $result = json_decode(curl_exec($ch), true);
            curl_close($ch);


            return $result;
        }
    }
    public function searchAction()
    {
        $city = $this->request->getPost("city");
        $type = $this->request->getPost("type");

        if ($type == "/current.json") {
            $this->response->redirect("index/current/?city=" . $city . "&&type=" . $type);
        }
        if ($type == "/forecast.json") {
            $this->response->redirect("index/forecast/?city=" . $city . "&&type=" . $type);
        }
        if ($type == "/astronomy.json") {
            $this->response->redirect("index/astronomy/?city=" . $city . "&&type=" . $type);
        }
        if ($type == "/sports.json") {
            $this->response->redirect("index/sports/?city=" . $city . "&&type=" . $type);
        }
        if ($type == "/timezone.json") {
            $this->response->redirect("index/timezone/?city=" . $city . "&&type=" . $type);
        }
        if ($type == "/history.json") {
      
            $this->response->redirect("index/history/?city=" . $city . "&&type=" . $type);
        }
    }
    public function currentAction()
    {

        $city = $_GET['city'];
        $type = $_GET['type'];

        $u = $this->getU($city, $type);


        $this->view->data = $u;
    }
    public function forecastAction()
    {

        $city = $_GET['city'];
        $type = $_GET['type'];

        $u = $this->getU($city, $type);

        $this->view->data = $u;
    }
    public function astronomyAction()
    {

        $city = $_GET['city'];
        $type = $_GET['type'];

        $u = $this->getU($city, $type);


        $this->view->data = $u;
    }
    public function sportsAction()
    {

        $city = $_GET['city'];
        $type = $_GET['type'];

        $u = $this->getU($city, $type);

        $this->view->data = $u;
    }
    public function timezoneAction()
    {

        $city = $_GET['city'];
        $type = $_GET['type'];

        $u = $this->getU($city, $type);


        $this->view->data = $u;
    }
    public function historyAction()
    {

        $city = $_GET['city'];
        $type = $_GET['type'];

        $u = $this->getU($city, $type);
     
        $this->view->data = $u;
    }
}
