<?php

/*
* This interface is a stragey to make the each HTTP format class.(GET, POST, PUT and etc.)
*
*/

namespace peter\WordPress;

interface HttpResponseInterface {
    public function httpResponse(HttpResponse $response);
}
