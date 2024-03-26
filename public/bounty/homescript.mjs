import BountyImage from './BountyImage.mjs';
import Bounty from './Bounty.mjs';


function main(){
    displayImages();

}

function displayImages(){
    const venomBountyImage = new BountyImage('venom.jpg', 'Venom','bountyImages');
    const jokerBountyImage = new BountyImage('joker.png', 'Joker','bountyImages');
    const cellBountyImage = new BountyImage('cell.jpg', 'Cell','bountyImages');
    
    const venomBounty = new Bounty('Venom Hunt', "You must find Venom before he destroys everything.", "$200,000,000");
    const jokerBounty = new Bounty('Joker Assassination', "You must find and assassinate the Joker. Good Luck.", "$1,000,000,000");
    const cellBounty = new Bounty('Cell Games', "Fight the Android in a tournament style arena.", "$500,000,000");
    

    
    venomBountyImage.getRender();
   

    jokerBountyImage.getRender();
    
    
    cellBountyImage.getRender();


}



main();