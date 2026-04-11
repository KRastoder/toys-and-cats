export default function DoctorCard({
    imagePath,
    name,
    speciality,
    closestAvalability,
    cheapestPrice,
}: {
    imagePath: string;
    name: string;
    speciality: string;
    closestAvalability: string;
    cheapestPrice: number;
}) {
    return (
        <article>
            <div>
                <img src={imagePath} alt="/" />
            </div>
            <div>
                <div>
                    <h1>{name}</h1>
                    <p>{speciality}</p>
                </div>
                <div>
                    <p>Avalable: {closestAvalability}</p>
                </div>
                <div>
                    <p>Starts from : {cheapestPrice}</p>
                </div>
            </div>
        </article>
    );
}
