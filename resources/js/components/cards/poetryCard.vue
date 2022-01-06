<template>
    <div class="poetry-card">
        <div class="title">
            "{{ data["title"] }}"
        </div>
        
        <div style="background-color: #1e3c86; overflow-y:scroll; padding: 15px 25px">
            {{data['body']}}
        </div>

        <div>
            <hr>  
            <div class="theme-title">
                {{data['theme']}}
            </div>  
        </div>

        <div>
            <!-- <form action="{{route('poetry.edit', $poetry->id)}}" method="post">
                <input type="hidden" name="_method" value="GET">
                @csrf
                <input class="tablerowBtn" type="submit" value="Edit">
            </form>
    
            <form action="{{route('poetry.destroy', $poetry->id)}}" method="post">
                <input type="hidden" name="_method" value="DELETE">
                @csrf
                <input class="tablerowBtn" type="submit" value="Delete">
            </form>   -->
    
        </div>
    </div>
</template>

<script>

export default {
    computed: {},
    props: ["data"],
};

</script>
