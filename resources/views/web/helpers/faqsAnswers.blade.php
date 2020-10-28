<div  class="Order_price spacing_bottom" >
    @foreach ($printTypeFaqs as $faq)
    <label for="Order_price">
        {{$faq->questions}}
    </label>
    <select name="Order_price" id="faqanswers" class="form_class form-control">
        @foreach ($faq->answers as $ans)
        <option value="{{$ans->answers}}">{{$ans->answers}}</option>
        @endforeach
    </select>
    @endforeach
</div>