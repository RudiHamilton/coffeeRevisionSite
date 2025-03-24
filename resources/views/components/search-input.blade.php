@props(['disabled' => false, 'placeholder' => 'Search...'])

<style>
    .search-wrapper {
        display: flex;
        align-items: left;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: visible;
        width: 400px;
        background: white;
    }
    .search-input {
        flex: 1;
        padding: 8px;
        border: none;
        outline: none !important; /* Force remove browser outline */
        box-shadow: none !important; /* Ensure no blue glow */
        width: 100%;
        border-radius:5px
    }
    .search-button {
        height:45px;
        background: #F1D2B1;
        color: black;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .search-button i {
        font-size: 16px;
    }
    .search-button:hover {
        background: #d29049;
    }
</style>

<div class="search-wrapper float-end">
    <input type="text" @disabled($disabled) placeholder="Search for Quizzes and Flashcards..." 
           {{ $attributes->merge(['class' => 'search-input']) }}>
    <button type="submit" class="search-button">
        <i class="fa fa-search">Search</i>
    </button>
</div>
