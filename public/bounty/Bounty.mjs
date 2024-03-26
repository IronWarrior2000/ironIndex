
class Bounty{
    constructor(title, description, reward) {
        this.title = title;
        this.description = description;
        this.reward = reward;
      }

    displayTitle() {
        document.querySelector("#bountyDisplayArea").textContent = this.title;
      }
    
    displayDescription() {
      document.querySelector("#bountyDisplayArea").textContent = this.description;      }

    displayReward() {
      document.querySelector("#bountyDisplayArea").textContent = this.reward;      }






}

export default Bounty;