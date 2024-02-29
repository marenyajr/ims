@props(['product'])
<div class ='card bg-gray-100 border border-gray-100 rounded-sm p-1  hover:shadow-md transition-transform transform hover:scale-101'>


                     <a href="/products/{{$product->id}}" class="">
                        <div class="mx-auto h-80">
                            <img
                                id="image"
                                class="md:block"
                                src='{{$product->image ? asset("storage/" . $product->image): asset("storage/product_images/no_image.jpg")}}'
                                alt=""
                            />

                            <div class="text-left pb-1 pl-3" id="details">
                                <div class="text-sm tracking-wide font-semibold text-gray-600 line-clamp-1">{{$product->description}}</div>
                                <h3 class="text-sm tracking-wide ">
                                    <a href="/products/{{$product->id}}">{{$product->product_name}}</a>
                                </h3>
                                <div class="text-sm tracking-wide font-semibold mb-4">{{$product->product_category}}</div>
                            
                                {{-- <x-product-details :detailsCSV="$product->details"/> --}}
                                    
                                {{-- <div class="text-lg mt-4">
                                    <i class="fa-solid fa-location-dot"></i> {{$product->description}}
                                </div> --}}
                            </div>
                            <button data-product-id="{{$product->id}}" class="hidden-button hidden w-full text-center bg-orange-400 hover:shadow-lg hover:bg-laravel rounded-sm py-2">
                                <a class=" text-gray-50 font-semibold text-sm ">ADD TO CART</a>
                            </button>
                            
                        </div>
                     </a>
                    
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
            // Retrieve cart count from local storage or set to 0 if not available
            let cartCount = localStorage.getItem("cartCount") || 0;
            updateCartCount(cartCount)});
    // Get the container element
const cardContainer = document.getElementById('card-container');

// Add event listener to the container element
cardContainer.addEventListener('mouseover', function(event) {
  // Check if the target element is the card or its descendant
  const card = event.target.closest('.card');
  if (card) {
    // Show the hidden button within the card
    const hiddenButton = card.querySelector('.hidden-button');
    if (hiddenButton) {
      hiddenButton.classList.remove('hidden');
       
   
    hiddenButton.addEventListener("click", function(event){
      // Increment cart count
              console.log(cardCount);
                cartCount++;
                // Update cart count in local storage
                localStorage.setItem("cartCount", cartCount);
                // Update cart count display
                updateCartCount(cartCount);
    });
  }

  }
});

cardContainer.addEventListener('mouseout', function(event) {
  // Check if the target element is the card or its descendant
  const card = event.target.closest('.card');
  if (card) {
    // Hide the hidden button within the card
    const hiddenButton = card.querySelector('.hidden-button');
    if (hiddenButton) {
      hiddenButton.classList.add('hidden');
    }    

  }
});



// Function to update cart count display
            function updateCartCount(count) {
                document.getElementById("cartItemCount").textContent = count;
                document.getElementById("cartItemCount").style.display = count > 0 ? "block" : "none";
            }

</script>
