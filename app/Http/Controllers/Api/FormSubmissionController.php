<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\FormSubnmissionSaveRequest;
use App\Http\Resources\Api\FormSubmissionResource;
use App\Models\FormSubmission;
use Wp\Utility\Email\Events\SendEmailEvent;

/**
 * Class AlertsController
 * @package App\Http\Controllers\Api\Admin
 * @group User API
 */
class FormSubmissionController extends ApiController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     **/
    public function index()
    {
        $formSubmissions = FormSubmission::all();

        return $this->respond(FormSubmissionResource::collection($formSubmissions));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(FormSubnmissionSaveRequest $request)
    {
        $formSubmission = FormSubmission::create($request->all());

        $data = [
            'to' => [
                'email' => $request->get('to_email') ?: 'guy-smiley@example.com',
                'name' => $request->input('to_name') ?: 'Guy Smiley'
            ],
            'subject' => $request->get('subject') ?: 'Dealer Inspire Code Challenge',
            'msg' => $request->get('message'),
            'from' => [
                'email' => $request->input('email') ?: 'benjaminmastrangelo@gmail.com',
                'name' => $request->input('full_name') ?: 'Benjamin Mastrangelo'
            ],
            'reply' => [
                'email' => $request->input('email') ?: 'benjaminmastrangelo@gmail.com',
                'name' => $request->input('full_name') ?: 'Benjamin Mastrangelo'
            ]
        ];

        event(new SendEmailEvent($data));

        return $this->respondCreated(new FormSubmissionResource($formSubmission->fresh()));
    }

    /**
      * @return \Illuminate\Http\JsonResponse
     */
    public function show(FormSubmissionResource $formSubmission)
    {
        return $this->respond(new FormSubmissionResource($formSubmission));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(FormSubnmissionSaveRequest $request, FormSubmissionResource $formSubmission)
    {
        $formSubmission->update($request->all());

        return $this->respond(new FormSubmissionResource($formSubmission->fresh()));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(FormSubmissionResource $formSubmission)
    {
        $formSubmission->delete();

        return $this->respondNoContent();
    }

}
