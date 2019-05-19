<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('updated_at', 'created_at', 'DESC')->paginate(15);
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->except('image');
        //validation
        $messages = [
            'title.max' => 'Наименование не более 200 символов',
            'image.required' => 'Изображение не корректно',
            'path.required' => 'Неправильный путь',
        ];
        $this->validate($request, [
           'title' => 'max:200',
           'image' => 'required|image|mimes:png,jpg,jpeg|max:1000',
           'path' => 'required|unique:sliders'
        ], $messages);
        //image upload
        $image = $request->image;
        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move('assets\images\slider', $imageName);
            $formInput['image'] = $imageName;
        }
        Slider::create($formInput);
        return redirect()->route('slide.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slide)
    {
        return view('admin.slider.form', compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slide)
    {
        $slide->update($request->only(['title', 'path', 'image']));
        return redirect()->route('slide.index');
    }
    public function delete()
    {
        return view('admin.slider.delete');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Slider $slide)
    {
        $slide->delete();
        //Slider::destroy($slide);
        return redirect()->route('slide.index');
    }
}
