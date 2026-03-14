export const fetchDonuts = async () => {
    const response = await fetch('../../../public/rosquilla.json');
    const data = await response.json();
    return data.donuts;
}