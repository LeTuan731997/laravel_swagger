<?php
/**
 * @SWG\Swagger(
 *     schemes={"http"},
 *     host=API_HOST,
 *     basePath="/",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="Laravel and Swagger",
 *         description="Getting started with Laravel and Swagger",
 *         termsOfService="",
 *         @SWG\Contact(
 *             email="name@example.com"
 *         ),
 *     ),
 * )
 */
 /**
     * @SWG\Get(
     *     path="/api/create",
     *     description="Return a user's first and last name",
     *     @SWG\Parameter(
     *         name="firstname",
     *         in="query",
     *         type="string",
     *         description="Your first name",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="lastname",
     *         in="query",
     *         type="string",
     *         description="Your last name",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Missing Data"
     *         $ref: "#/definitions/"

     *     )
     * ),
     */
 /**
     * @SWG\Post(
     *      path="/api/user",
     *      tags={"User"},
     *      operationId="ApiV1saveUser",
     *      summary="Add User",
     *      consumes={"application/x-www-form-urlencoded"},
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="name",
     *          in="formData",
     *          required=true, 
     *          type="string" 
     *      ),
     *      @SWG\Parameter(
     *          name="phone",
     *          in="formData",
     *          required=true, 
     *          type="number" 
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Success"
     *      ),
     *        ),
     */