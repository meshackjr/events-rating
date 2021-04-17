<div>
    <input type="hidden" value="{{ $eventId }}" name="eventId">
        @csrf
        <div class="row my-4">
            <div class="form-group col-md-6">
                <label>Question 1</label>
                <input class="form-control" wire:model="qn1" name="qn1" type="text" placeholder="Type Your Question">
            </div>
            <div class="form-group col-md-6">
                <label>Question Type</label>
                <select name="event_category_id" class="form-control" wire:model="qn1type">
                    <option value="short">Short Question</option>
                    <option value="long">Long Question</option>
                    <option value="options">Options Question</option>
                </select>
            </div>
            @if($qn1type === 'options')
                <div class="form-group col-md-12 mt-3" >
                    <label>Question 1 Options, Separate by using ";" </label>
                    <textarea class="form-control" wire:model="qn1options" name="qn1options"></textarea>
                </div>
            @endif
        </div>
    <div class="row my-4">
        <div class="form-group col-md-6">
            <label>Question 2</label>
            <input class="form-control" wire:model="qn2" name="qn2" type="text" placeholder="Type Your Question">
        </div>
        <div class="form-group col-md-6">
            <label>Question Type</label>
            <select name="event_category_id" class="form-control" wire:model="qn2type">
                <option value="short">Short Question</option>
                <option value="long">Long Question</option>
                <option value="options">Options Question</option>
            </select>
        </div>
        @if($qn2type === 'options')
            <div class="form-group col-md-12 mt-3" >
                <label>Question 2 Options, Separate by using ";" </label>
                <textarea class="form-control" wire:model="qn2options" name="qn2options"></textarea>
            </div>
        @endif
    </div>
    <div class="row my-4">
        <div class="form-group col-md-6">
            <label>Question 3</label>
            <input class="form-control" wire:model="qn3" name="qn3" type="text" placeholder="Type Your Question">
        </div>
        <div class="form-group col-md-6">
            <label>Question Type</label>
            <select name="event_category_id" class="form-control" wire:model="qn3type">
                <option value="short">Short Question</option>
                <option value="long">Long Question</option>
                <option value="options">Options Question</option>
            </select>
        </div>
        @if($qn3type === 'options')
            <div class="form-group col-md-12 mt-3" >
                <label>Question 3 Options, Separate by using ";" </label>
                <textarea class="form-control" wire:model="qn3options" name="qn3options"></textarea>
            </div>
        @endif
    </div>

        <button wire:click="submit" class="btn btn-primary" type="submit"><i class="fa fa-plus-circle"></i> Create</button>

</div>
