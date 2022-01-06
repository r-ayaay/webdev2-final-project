<template>
  <a href="">
    <h2>{{ data["title"] }}</h2>
    <div class="exhibit-card">
      <div class="exhibit-details">
        <!-- <span>Artist: </span> <span>{{$item->user->name}}</span>
        <span>Theme: </span> <span>{{$item->theme}}</span>
        <span>Description: </span> <span>{{$item->description}}</span>
        <span>Duration: </span>
        <span><?php echo $startDate; echo " - "; echo $endDate;?></span> -->
      </div>
    </div>
    <!-- status: @if($item->status == 'paid') -->
    <span style="color: #0fc963">PAID</span>
    <!-- @else -->
    <span style="color: #ee0a15">PENDING</span>
    <!-- @endif -->
  </a>
</template>
<script>
export default {
  computed: {},
  props: ["data"],
};
</script>
